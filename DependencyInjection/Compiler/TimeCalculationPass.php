<?php


namespace ZYS\DurationScoreBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class TimeCalculationPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $definition     = $container->findDefinition('ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler\TimeCalculationHandlerProvider');
        $taggedServices = $container->findTaggedServiceIds('duration_score.time_calculation_handler');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addHandler', [new Reference($id)]);
        }
    }
}