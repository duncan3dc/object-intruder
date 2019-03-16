<?php

namespace duncan3dc\ObjectIntruder\PHPStan;

use duncan3dc\ObjectIntruder\Intruder;
use function get_class;
use PhpParser\Node\Expr\StaticCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParametersAcceptorSelector;
use PHPStan\Type\Constant\ConstantStringType;
use PHPStan\Type\DynamicStaticMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;

class StaticIntrudeMethod implements DynamicStaticMethodReturnTypeExtension
{


    public function getClass(): string
    {
        return Intruder::class;
    }


    public function isStaticMethodSupported(MethodReflection $methodReflection): bool
    {
        return $methodReflection->getName() === "intrude";
    }


    public function getTypeFromStaticMethodCall(MethodReflection $methodReflection, StaticCall $methodCall, Scope $scope): Type
    {
        $defaultReturnType = ParametersAcceptorSelector::selectSingle($methodReflection->getVariants())->getReturnType();
        if (count($methodCall->args) === 0) {
            return $defaultReturnType;
        }

        $classType = $scope->getType($methodCall->args[0]->value);
        if (!$classType instanceof ObjectType) {
            return $defaultReturnType;
        }

        return TypeCombinator::intersect($defaultReturnType, $classType);
    }
}
