<?php

namespace Lewik\BoManagerBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\EntityRepositoryGenerator;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use Lewik\BoManagerBundle\Entity\BoConfiguration;
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
     * @param BoConfiguration $boConfiguration
     * @throws \Doctrine\ORM\Mapping\MappingException
     * @throws \Doctrine\ORM\Tools\Export\ExportException
     */
    public function generateEntity(BoConfiguration $boConfiguration)
    {
        $format = 'xml';

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->doctrine->getManager();
        $config = $entityManager->getConfiguration();
        $bundle = $this->kernel->getBundle('LewikBoBundle');

        $config->setEntityNamespaces(array_merge(
            [$bundle->getName() => $bundle->getNamespace() . '\\Entity'],
            $config->getEntityNamespaces()
        ));

        $entityClass = $this->doctrine->getAliasNamespace($bundle->getName()) . '\\' . $boConfiguration->getSystemName();
        $entityPath = $bundle->getPath() . '/Entity/' . str_replace('\\', '/', $boConfiguration->getSystemName()) . '.php';
        if (file_exists($entityPath)) {
            $this->filesystem->remove($entityPath);
        }


        $class = new ClassMetadataInfo($entityClass);

        $class->customRepositoryClassName = $entityClass . 'Repository';


        $class->mapField(['fieldName' => 'id', 'type' => 'integer', 'id' => true]);
        $class->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);
        foreach ($boConfiguration->getFields() as $field) {
            $class->mapField([
                'columnName' => $this->makeColumnName($field->getSystemName()),
                'fieldName' => $field->getSystemName(),
                'type' => $field->getType(),
                'length' => $field->getLength(),
            ]);
        }

        $entityGenerator = $this->getEntityGenerator();

        $cme = new ClassMetadataExporter();
        $exporter = $cme->getExporter($format);
        $mappingPath = $bundle->getPath() . '/Resources/config/doctrine/' . str_replace('\\', '.', $boConfiguration->getSystemName()) . '.orm.' . $format;

        if (file_exists($mappingPath)) {
            $this->filesystem->remove($mappingPath);
        }

        //region генерация кода и конфига
        $mappingCode = $exporter->exportClassMetadata($class);
        $entityGenerator->setGenerateAnnotations(false);
        $entityCode = $entityGenerator->generateEntityClass($class);
        //endregion



        //region Запись класса
        $this->filesystem->mkdir(dirname($entityPath));
        file_put_contents($entityPath, $entityCode);
        //endregion

        //region Запись конфига
        $this->filesystem->mkdir(dirname($mappingPath));
        file_put_contents($mappingPath, $mappingCode);
        //endregion


        //region Запись репозитория
        $path = $bundle->getPath() . str_repeat('/..', substr_count(get_class($bundle), '\\'));
        $this->getRepositoryGenerator()->writeEntityRepositoryClass($class->customRepositoryClassName, $path);
        //endregion


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

    /**
     *
     */
    public function generateAll()
    {
        $boConfigurations = $this->doctrine->getManager()->getRepository('LewikBoManagerBundle:BoConfiguration')->findAll();
        foreach ($boConfigurations as $boConfiguration) {
            $this->generateEntity($boConfiguration);
        };
    }

    /**
     * @param $getSystemName
     * @return mixed
     */
    private function makeColumnName($getSystemName)
    {
        return $getSystemName;
    }
} 