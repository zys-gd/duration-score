<?php


namespace ZYS\DurationScoreBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use ZYS\DurationScoreBundle\DependencyInjection\Compiler\ScoreTransformationPass;
use ZYS\DurationScoreBundle\DependencyInjection\Compiler\TimeCalculationPass;

class DurationScoreBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ScoreTransformationPass());
        $container->addCompilerPass(new TimeCalculationPass());
    }
}