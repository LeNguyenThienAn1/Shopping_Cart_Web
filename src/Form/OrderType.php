<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Cart;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Cart', EntityType::class, [
                // looks for choices from this entity
                'class' => Cart::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'id'])
            ->add('Product', EntityType::class, [
                // looks for choices from this entity
                'class' => Product::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
