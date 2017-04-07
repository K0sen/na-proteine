<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac\AuthorRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
//        // добавляем разрешение "addComment"
//        $addComment = $auth->createPermission('addComment');
//        $addComment->description = 'Add a comment';
//        $auth->add($addComment);
//
//        // добавляем разрешение "updateComment"
//        $updateComment = $auth->createPermission('updateComment');
//        $updateComment->description = 'Update a Comment';
//        $auth->add($updateComment);
//
//        // добавляем роль "user" и даём роли разрешение "addComment"
//        $user = $auth->createRole('user');
//        $auth->add($user);
//        $auth->addChild($user, $addComment);
//
//        // добавляем роль "admin" и даём роли разрешение "updateComment"
//        // а также все разрешения роли "user"
//        $admin = $auth->createRole('admin');
//        $auth->add($admin);
//        $auth->addChild($admin, $updateComment);
//        $auth->addChild($admin, $user);
//
//        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
//        // обычно реализуемый в модели User.
//        $auth->assign($user, 2);
//        $auth->assign($admin, 1);

        // AFTER
//        $user = Yii::$app->authManager->getRole('user');
//        $updateComment = Yii::$app->authManager->getPermission('updateComment');
//
//        $rule = new AuthorRule;
//        $auth->add($rule);
//
//// добавляем разрешение "updateOwnPost" и привязываем к нему правило.
//        $updateOwnComment = $auth->createPermission('updateOwnComment');
//        $updateOwnComment->description = 'Update own comment';
//        $updateOwnComment->ruleName = $rule->name;
//        $auth->add($updateOwnComment);
//
//// "updateOwnPost" будет использоваться из "updatePost"
//        $auth->addChild($updateOwnComment, $updateComment);
//
//// разрешаем "автору" обновлять его посты
//        $auth->addChild($user, $updateOwnComment);
    }
}