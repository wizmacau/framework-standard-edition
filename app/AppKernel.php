<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            /*
             * Depend bundle
             */
            new \FOS\UserBundle\FOSUserBundle(),
            new \Lexik\Bundle\FormFilterBundle\LexikFormFilterBundle(),
            new \Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new \Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new \FM\ElfinderBundle\FMElfinderBundle(),
            new \A2lix\TranslationFormBundle\A2lixTranslationFormBundle(),
            new \Snc\RedisBundle\SncRedisBundle(),
            /*
             * Wiz bundle
             */
            new \Wiz\UserBundle\WizUserBundle(),
            new \Wiz\AdmintoolsBundle\WizAdmintoolsBundle(),
            new \Wiz\CKEditorBundle\WizCKEditorBundle(),
            new \Wiz\ToolsBundle\WizToolsBundle(),
            new \Wiz\CmsBundle\WizCmsBundle(),
            new \Wiz\FaqBundle\WizFaqBundle(),
            new \Wiz\FrontendBundle\WizFrontendBundle(),
            new \Wiz\RecruitBundle\WizRecruitBundle(),
            new \Wiz\SubsiteBundle\WizSubsiteBundle()
            /*
             * Project bundle
             */
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
