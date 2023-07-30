<?php

class LoginCommand extends Command
{
    public function execute(CommandContext $context): bool
    {
        $manager = Registry::getAccessManager();
        $user = $context->get('username');
        $pass = $context->get('pass');
        $user_obj = $manager->login($user, $pass);
        if (is_null($user_obj)) {
            $context->setError($manager->getError());
            return false;
        }
        $context->addParam("user", $user_obj);
        return true;
    }

}