<?php

use Symfony\Component\HttpKernel\Kernel;
use \Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    /**
     * Returns an array of bundles to register.
     *
     * @return \Symfony\Component\HttpKernel\Bundle\BundleInterface[] An array of bundle instances.
     */
    public function registerBundles()
    {
        $bundles = array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \AppBundle\AppBundle()
        );

        if ($this->getEnvironment() == 'dev') {
            $bundles[] = new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    /**
     * Loads the container configuration.
     *
     * @param \Symfony\Component\Config\Loader\LoaderInterface $loader A LoaderInterface instance
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

}