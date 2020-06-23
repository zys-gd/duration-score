<?php


namespace ZYS\DurationScoreBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ScoreTransformationPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $definition     = $container->findDefinition('ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationHandlerProvider');
        $taggedServices = $container->findTaggedServiceIds('duration_score.score_transformation_handler');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addHandler', [new Reference($id)]);
        }
    }
}