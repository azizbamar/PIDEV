<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\UserController;
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Validator\Constraints\Length;
use App\Entity\User;
<<<<<<< HEAD
use App\Service\DatabaseService;
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
<<<<<<< HEAD
    private DatabaseService $databaseService;
    private UserController $userController;

    public function __construct(DatabaseService $databaseService, UserController $userController)
    {
        $this->databaseService = $databaseService;
        $this->userController = $userController;
    }
=======
>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            // ->add('roles')
            ->add('firstName')
            ->add('lastName')
            ->add('cin')
            ->add('address')
            ->add('phoneNumber')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Expert' => 'ROLE_EXPERT',
                    'Pharmacist' => 'ROLE_PHARMACIST',
                    'Doctor' => 'ROLE_DOCTOR',
                    'Agent' => 'ROLE_AGENT',
<<<<<<< HEAD
                    'Admin' => 'ROLE_ADMIN',
                    'Super Admin' => 'ROLE_SUPER_ADMIN',
                ],
                'multiple' => true,
                'expanded' => false,
                'attr' => [
                    'class' => 'js-example-basic-multiple', // Add the Bootstrap class 'form-select' here
                ],
                 'required' => false,
            ])
            ->add('claims', ChoiceType::class, [
                'choices' => $this->getClaimsChoices(),
                'multiple' => true,
                'expanded' => false,
                'attr' => [
                    'class' => 'form-control js-example-basic-multiple',
                ],
                'required' => false,
            ]);
    }
    
   
    private function getClaimsChoices(): array
    {
        $response = $this->userController->listTables($this->databaseService);
        $tablesData = json_decode($response->getContent(), true);

        $choices = [];

        foreach ($tablesData as $tableData) {
            foreach ($tableData as $tableName => $permissions) {
                $choices[$tableName] = [
                    'All ' . $tableName .' priviliges' => 'all_' . $tableName, // Add a "Select All" option
                    'Can Create ' . $tableName => 'c_' . $tableName,
                    'Can Read ' . $tableName => 'r_' . $tableName,
                    'Can Update ' . $tableName => 'u_' . $tableName,
                    'Can Delete ' . $tableName => 'd_' . $tableName,
                ];
            }
        }

        return $choices;
    }
=======
                    'Sous Admin'=>'ROLE_SOUS_ADMIN',
                    'Admin' => 'ROLE_ADMIN',
                    'Super Admin' => 'ROLE_SUPER_ADMIN',
    
                ],
                'multiple' => true,
                'expanded' => false,
                // 'required' => true,
            ])
            ->add('password', PasswordType::class, [
              
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])

    
        ;
    }

>>>>>>> 6420834e7355e2da80ba35953ed94643a74ec016
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
