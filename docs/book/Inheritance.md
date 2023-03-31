# Inheritance in Php

Short explainations for testing the directory structure for articles.

**__Interfaces__**

Generally interfaces are roadmaps for what a group of classes are going to do. They define the public visibilty of the group of classes
that will implement said interface. They will also usually define constants to normalize certain values that the classes will be using.
You can not instantiate an instance of an Interface. Classes you them via the **implements** keyword. All interface names must end with Interface ie ExampleInterface. Interfaces can only implement public methods (functions) and you can not define a body in the interface. Only the methods signature is defined in the interface. If you need visibility more restrictive than public then you should provide an Abstract class that implements the Interface and then declare the protected methods as abstract in the abstract class see below.

```
interface ExampleInterface
{
    public const SOME_CONSTANT = 'something';

    public function getSomething(): ?string;
}
```

Example
```class Example implements ExampleInterface```

**__Abstract Classes__**
Abstract classes are similar to Interfaces in the fact that they can define method signatures that force extending classes to implement those methods. They can have more restrictive visibility than public. They can also implement methods themselves that define the common functionality of the set or "family" of classes. If you find yourself copying and pasting code between classes, theres a VERY good change it belongs in an Abstract parent class.

Example
```
abstract class AbstractExample implements ExampleInterface
{
    protected abstract function doSomething(?array $someVariable = []);

}
```
Notice now that I did NOT implement the interface method in the Abstract class. You do not have to becuase you can not create an instance
of an Abstract class, just like interfaces. You have to extend an Abstract class into a "concrete implementation".

```
final class Example extends AbstractExample
{
    // here you must implement both the abstract protected methods of the abstract class and the public methods of the interface
}
```