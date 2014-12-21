<?php

namespace Lewik\BoManagerBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\EntityRepositoryGenerator;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpKernel\KernelInterface;

/** Class BoManager */
class BoManager
{

    /** @var RegistryInterface */
    protected $doctrine;
    /** @var KernelInterface */
    protected $kernel;
    /** @var Filesystem */
    protected $filesystem;

    /**
     * @param KernelInterface $kernel
     * @param RegistryInterface $doctrine
     * @param Filesystem $filesystem
     */
    public function __construct(KernelInterface $kernel, RegistryInterface $doctrine, Filesystem $filesystem)
    {
        $this->kernel = $kernel;
        $this->doctrine = $doctrine;
        $this->filesystem = $filesystem;

    }

    /**
     *
     */
    public function getBoObjectList()
    {
        $finder = new Finder();
        $finder->files()->in(
            $this->kernel->getRootDir() . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'src' . DIRECTORY_SEPARATOR .
            'Lewik' . DIRECTORY_SEPARATOR .
            'BoBundle' . DIRECTORY_SEPARATOR .
            'Resources' . DIRECTORY_SEPARATOR .
            'config' . DIRECTORY_SEPARATOR .
            'doctrine'
        );

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            //$file->
        }
    }

    /**
     *
     */
    public function makeTestEntity()
    {
        $format = 'xml';

        //region Хардкодим на время
        $entity = 'Test' . time();
        $fields = [
            [
                'columnName' => 'asdsdsadsadsa',
                'fieldName' => 'asdsdsadsadsa',
                'type' => 'string',
                'length' => 255,
            ],
        ];
        $withRepository = true;
        //endregion


        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->doctrine->getManager();
        $config = $entityManager->getConfiguration();
        $bundle = $this->kernel->getBundle('LewikBoBundle');

        $config->setEntityNamespaces(array_merge(
            [$bundle->getName() => $bundle->getNamespace() . '\\Entity'],
            $config->getEntityNamespaces()
        ));

        $entityClass = $this->doctrine->getAliasNamespace($bundle->getName()) . '\\' . $entity;
        $entityPath = $bundle->getPath() . '/Entity/' . str_replace('\\', '/', $entity) . '.php';
        if (file_exists($entityPath)) {
            throw new \RuntimeException(sprintf('Entity "%s" already exists.', $entityClass));
        }

        $class = new ClassMetadataInfo($entityClass);
        if ($withRepository) {
            $class->customRepositoryClassName = $entityClass . 'Repository';
        }

        $class->mapField(['fieldName' => 'id', 'type' => 'integer', 'id' => true]);
        $class->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);
        foreach ($fields as $field) {
            $class->mapField($field);
        }

        $entityGenerator = $this->getEntityGenerator();

        $cme = new ClassMetadataExporter();
        $exporter = $cme->getExporter($format);
        $mappingPath = $bundle->getPath() . '/Resources/config/doctrine/' . str_replace('\\', '.', $entity) . '.orm.' . $format;

        if (file_exists($mappingPath)) {
            throw new \RuntimeException(sprintf('Cannot generate entity when mapping "%s" already exists.', $mappingPath));
        }

        $mappingCode = $exporter->exportClassMetadata($class);
        $entityGenerator->setGenerateAnnotations(false);
        $entityCode = $entityGenerator->generateEntityClass($class);


        $this->filesystem->mkdir(dirname($entityPath));
        file_put_contents($entityPath, $entityCode);

        if ($mappingPath) {
            $this->filesystem->mkdir(dirname($mappingPath));
            file_put_contents($mappingPath, $mappingCode);
        }

        if ($withRepository) {
            $path = $bundle->getPath() . str_repeat('/..', substr_count(get_class($bundle), '\\'));
            $this->getRepositoryGenerator()->writeEntityRepositoryClass($class->customRepositoryClassName, $path);
        }


    }

    /**
     * @return EntityGenerator
     */
    protected function getEntityGenerator()
    {
        $entityGenerator = new EntityGenerator();
        $entityGenerator->setGenerateAnnotations(false);
        $entityGenerator->setGenerateStubMethods(true);
        $entityGenerator->setRegenerateEntityIfExists(false);
        $entityGenerator->setUpdateEntityIfExists(true);
        $entityGenerator->setNumSpaces(4);
        $entityGenerator->setAnnotationPrefix('ORM\\');

        return $entityGenerator;
    }

    /**
     * @return EntityRepositoryGenerator
     */
    protected function getRepositoryGenerator()
    {
        return new EntityRepositoryGenerator();
    }
} 