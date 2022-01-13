<?php

namespace app\commands;

use app\rbac\UserGroupRule;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll();
        // Create roles
        $guest  = $authManager->createRole('guest');
        $student  = $authManager->createRole('student');
        $teacher  = $authManager->createRole('teacher');
        $admin = $authManager->createRole('admin');


        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('signup');


        $adminIndex = $authManager->createPermission('admin/index');
        $upload = $authManager->createPermission('admin/upload');

        $courseworkIndex = $authManager->createPermission('admin/coursework/index');
        $courseworkView = $authManager->createPermission('admin/coursework/view');
        $courseworkCreate = $authManager->createPermission('admin/coursework/create');
        $courseworkUpdate = $authManager->createPermission('admin/coursework/update');
        $courseworkDelete = $authManager->createPermission('admin/coursework/delete');

        $diplomIndex = $authManager->createPermission('admin/diplom/index');
        $diplomView = $authManager->createPermission('admin/diplom/view');
        $diplomCreate = $authManager->createPermission('admin/diplom/create');
        $diplomUpdate = $authManager->createPermission('admin/diplom/update');
        $diplomDelete = $authManager->createPermission('admin/diplom/delete');

        $groupIndex = $authManager->createPermission('admin/group/index');
        $groupView = $authManager->createPermission('admin/group/view');
        $groupCreate = $authManager->createPermission('admin/group/create');
        $groupUpdate = $authManager->createPermission('admin/group/update');
        $groupDelete = $authManager->createPermission('admin/group/delete');

        $userIndex = $authManager->createPermission('admin/user/index');
        $userView = $authManager->createPermission('admin/user/view');
        $userUpdate = $authManager->createPermission('admin/user/update');
        $userDelete = $authManager->createPermission('admin/user/delete');


        $coursework_recordIndex = $authManager->createPermission('coursework_record/index');
        $coursework_recordView = $authManager->createPermission('coursework_record/view');
        $coursework_recordUpdate = $authManager->createPermission('coursework_record/update');

        $diplom_recordIndex = $authManager->createPermission('diplom_record/index');
        $diplom_recordView = $authManager->createPermission('diplom_record/view');
        $diplom_recordUpdate = $authManager->createPermission('diplom_record/update');

        $viewCourseworkList = $authManager->createPermission('coursework/index');
        $viewDiplomList = $authManager->createPermission('diplom/index');




        $authManager->add($coursework_recordIndex);
        $authManager->add($coursework_recordView);
        $authManager->add($coursework_recordUpdate);

        $authManager->add($diplom_recordIndex);
        $authManager->add($diplom_recordView);
        $authManager->add($diplom_recordUpdate);

        $authManager->add($viewCourseworkList);
        $authManager->add($viewDiplomList);



        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);

        $authManager->add($adminIndex);
        $authManager->add($upload);

        //coursework
        $authManager->add($courseworkIndex);
        $authManager->add($courseworkView);
        $authManager->add($courseworkCreate);
        $authManager->add($courseworkUpdate);
        $authManager->add($courseworkDelete);

        //diplom
        $authManager->add($diplomIndex);
        $authManager->add($diplomView);
        $authManager->add($diplomCreate);
        $authManager->add($diplomUpdate);
        $authManager->add($diplomDelete);

        //group
        $authManager->add($groupIndex);
        $authManager->add($groupView);
        $authManager->add($groupCreate);
        $authManager->add($groupUpdate);
        $authManager->add($groupDelete);

        //user
        $authManager->add($userIndex);
        $authManager->add($userView);
        $authManager->add($userUpdate);
        $authManager->add($userDelete);




        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $student->ruleName  = $userGroupRule->name;
        $teacher->ruleName  = $userGroupRule->name;
        $admin->ruleName = $userGroupRule->name;


        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($student);
        $authManager->add($teacher);
        $authManager->add($admin);


        $authManager->addChild($student, $coursework_recordIndex);
        $authManager->addChild($student, $coursework_recordView);
        $authManager->addChild($student, $coursework_recordUpdate);

        $authManager->addChild($student, $diplom_recordIndex);
        $authManager->addChild($student, $diplom_recordView);
        $authManager->addChild($student, $diplom_recordUpdate);

        $authManager->addChild($student, $viewCourseworkList);
        $authManager->addChild($student, $viewDiplomList);

        // Add permission-per-role in Yii::$app->authManager
        // guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);


        // Teacher
        $authManager->addChild($teacher, $guest);
        $authManager->addChild($teacher, $courseworkIndex);
        $authManager->addChild($teacher, $courseworkView);
        $authManager->addChild($teacher, $courseworkCreate);
        $authManager->addChild($teacher, $courseworkUpdate);
        $authManager->addChild($teacher, $courseworkDelete);

        $authManager->addChild($teacher, $diplomIndex);
        $authManager->addChild($teacher, $diplomView);
        $authManager->addChild($teacher, $diplomCreate);
        $authManager->addChild($teacher, $diplomUpdate);
        $authManager->addChild($teacher, $diplomDelete);

        $authManager->addChild($teacher, $groupIndex);
        $authManager->addChild($teacher, $groupView);
        $authManager->addChild($teacher, $groupCreate);
        $authManager->addChild($teacher, $groupUpdate);
        $authManager->addChild($teacher, $groupDelete);

        $authManager->addChild($teacher, $viewCourseworkList);
        $authManager->addChild($teacher, $viewDiplomList);


        // Admin
        $authManager->addChild($admin, $guest);
        $authManager->addChild($admin, $teacher);
        $authManager->addChild($admin, $adminIndex);
        $authManager->addChild($admin, $upload);
        $authManager->addChild($admin, $userIndex);
        $authManager->addChild($admin, $userView);
        $authManager->addChild($admin, $userUpdate);
        $authManager->addChild($admin, $userDelete);

        $authManager->addChild($admin, $viewCourseworkList);
        $authManager->addChild($admin, $viewDiplomList);






    }
}
