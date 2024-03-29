<?php
/**
 * Post add form.
 */

namespace Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PostType.
 */

class PostType extends AbstractType
{

    /**
     * Build add post form.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'content',
            TextareaType::class,
            [
                'label' => 'Post',
                'required' => false,
                'attr' => [
                    'max_length' => 10000,
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(
                        [
                            'max' => 10000,
                        ]
                    ),
                ],
            ]
        );
    }

    /**
     * Get block prefix.
     *
     * @return string
     */

    public function getBlockPrefix()
    {
        return 'post_type';
    }
}