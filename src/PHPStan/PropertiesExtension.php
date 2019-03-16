<?php

namespace duncan3dc\ObjectIntruder\PHPStan;

use duncan3dc\ObjectIntruder\IntruderInterface;
use PHPStan\Reflection\ClassMemberAccessAnswerer;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ConstantReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\Php\PhpPropertyReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Type\CompoundType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;

class PropertiesExtension implements PropertiesClassReflectionExtension
{


    /**
     * @inheritdoc
     */
    public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
    {
echo $classReflection->getDisplayName() . "->{$propertyName}\n";
if ($classReflection instanceof Type) {
    print_r($classReflection->getReferencedClasses());
}
        return $classReflection->getNativeReflection()->hasProperty($propertyName);
    }


    /**
     * @inheritdoc
     */
    public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
    {
        return new PhpPropertyReflection(
            $classReflection,
            new StringType(),
            $classReflection->getNativeReflection()->getProperty($propertyName),
		false,
		false
        );
    }
}
