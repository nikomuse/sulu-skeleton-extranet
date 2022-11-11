<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\DependencyInjection;

use App\Form\Type\PasswordForgetType;
use App\Form\Type\PasswordResetType;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    public const WEBSPACES = 'webspaces';

    // Basic Webspace configuration
    public const EMAIL_FROM = 'from';
    public const EMAIL_FROM_NAME = 'name';
    public const EMAIL_FROM_EMAIL = 'email';
    public const EMAIL_TO = 'to';
    public const EMAIL_TO_NAME = 'name';
    public const EMAIL_TO_EMAIL = 'email';
    public const ROLE = 'role';
    public const WEBSPACE_KEY = 'webspace_key';
    public const FIREWALL = 'firewall';
    public const MAINTENANCE = 'maintenance';

    // Form types
    public const TYPE_LOGIN = 'login';
    public const TYPE_REGISTRATION = 'registration';
    public const TYPE_COMPLETION = 'completion';
    public const TYPE_CONFIRMATION = 'confirmation';
    public const TYPE_PASSWORD_FORGET = 'password_forget';
    public const TYPE_PASSWORD_RESET = 'password_reset';
    public const TYPE_BLACKLISTED = 'blacklisted';
    public const TYPE_BLACKLIST_CONFIRMED = 'blacklist_confirmed';
    public const TYPE_BLACKLIST_DENIED = 'blacklist_denied';
    public const TYPE_PROFILE = 'profile';
    public const TYPE_EMAIL_CONFIRMATION = 'email_confirmation';

    public static $TYPES = [
        self::TYPE_LOGIN,
        self::TYPE_PASSWORD_FORGET,
        self::TYPE_PASSWORD_RESET,
    ];

    // Type configurations
    public const ENABLED = 'enabled';
    public const TEMPLATE = 'template';
    public const SERVICE = 'service';
    public const EMBED_TEMPLATE = 'embed_template';
    public const FORM_TYPE = 'type';
    public const FORM_TYPE_OPTIONS = 'options';
    public const ACTIVATE_USER = 'activate_user';
    public const AUTO_LOGIN = 'auto_login';
    public const REDIRECT_TO = 'redirect_to';
    public const EMAIL = 'email';
    public const EMAIL_SUBJECT = 'subject';
    public const EMAIL_ADMIN_TEMPLATE = 'admin_template';
    public const EMAIL_USER_TEMPLATE = 'user_template';
    public const DELETE_USER = 'delete_user';

    // Other configurations
    public const LAST_LOGIN = 'last_login';
    public const REFRESH_INTERVAL = 'refresh_interval';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sulu_community');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode(self::LAST_LOGIN)
                    ->canBeEnabled()
                    ->children()
                        ->integerNode(self::REFRESH_INTERVAL)->defaultValue(600)->end()
                    ->end()
                ->end()
                ->arrayNode('webspaces')
                    ->normalizeKeys(false)
                    ->useAttributeAsKey('webspaceKey')
                    ->prototype('array')
                        ->children()
                            // Basic Webspace Configuration
                            ->arrayNode(self::EMAIL_FROM)
                                ->children()
                                    ->scalarNode(self::EMAIL_FROM_NAME)->defaultValue(null)->end()
                                    ->scalarNode(self::EMAIL_FROM_EMAIL)->defaultValue(null)->end()
                                ->end()
                                ->beforeNormalization()
                                ->ifString()
                                    ->then(function ($value) {
                                        return [
                                            self::EMAIL_FROM_NAME => $value,
                                            self::EMAIL_FROM_EMAIL => $value,
                                        ];
                                    })
                                ->end()
                            ->end()
                            ->arrayNode(self::EMAIL_TO)
                                ->children()
                                    ->scalarNode(self::EMAIL_TO_NAME)->defaultValue(null)->end()
                                    ->scalarNode(self::EMAIL_TO_EMAIL)->defaultValue(null)->end()
                                ->end()
                                ->beforeNormalization()
                                ->ifString()
                                    ->then(function ($value) {
                                        return [
                                            self::EMAIL_TO_NAME => $value,
                                            self::EMAIL_TO_EMAIL => $value,
                                        ];
                                    })
                                ->end()
                            ->end()
                            ->scalarNode(self::ROLE)->defaultValue(null)->end()
                            ->scalarNode(self::FIREWALL)->defaultValue(null)->end()
                            // Maintenance
                            ->arrayNode(self::MAINTENANCE)
                                ->canBeEnabled()
                                ->children()
                                    ->scalarNode(self::TEMPLATE)->defaultValue('@SuluCommunity/maintenance.html.twig')->end()
                                ->end()
                            ->end()
                            // Login
                            ->arrayNode(self::TYPE_LOGIN)
                                ->addDefaultsIfNotSet()
                                ->children()
                                    // Login configuration
                                    ->scalarNode(self::TEMPLATE)->defaultValue('@SuluCommunity/login.html.twig')->end()
                                    ->scalarNode(self::EMBED_TEMPLATE)->defaultValue('@SuluCommunity/login-embed.html.twig')->end()
                                ->end()
                            ->end()
                            // Password Forget
                            ->arrayNode(self::TYPE_PASSWORD_FORGET)
                                ->addDefaultsIfNotSet()
                                ->children()
                                    // Password Forget configuration
                                    ->scalarNode(self::TEMPLATE)->defaultValue('@SuluCommunity/password-forget-form.html.twig')->end()
                                    ->scalarNode(self::FORM_TYPE)->defaultValue(PasswordForgetType::class)->end()
                                    ->arrayNode(self::FORM_TYPE_OPTIONS)
                                        ->prototype('scalar')->end()->defaultValue([])
                                    ->end()
                                    ->scalarNode(self::REDIRECT_TO)->defaultValue('?send=true')->end()
                                    ->arrayNode(self::EMAIL)
                                        ->addDefaultsIfNotSet()
                                        ->children()
                                            ->scalarNode(self::EMAIL_SUBJECT)->defaultValue('Password Forget')->end()
                                            ->scalarNode(self::EMAIL_ADMIN_TEMPLATE)->defaultValue(null)->end()
                                            ->scalarNode(self::EMAIL_USER_TEMPLATE)->defaultValue('@SuluCommunity/password-forget-email.html.twig')->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                            // Password Forget
                            ->arrayNode(self::TYPE_PASSWORD_RESET)
                                ->addDefaultsIfNotSet()
                                ->children()
                                    // Password Forget configuration
                                    ->scalarNode(self::TEMPLATE)->defaultValue('@SuluCommunity/password-reset-form.html.twig')->end()
                                    ->scalarNode(self::FORM_TYPE)->defaultValue(PasswordResetType::class)->end()
                                    ->arrayNode(self::FORM_TYPE_OPTIONS)
                                        ->prototype('scalar')->end()->defaultValue([])
                                    ->end()
                                    ->scalarNode(self::AUTO_LOGIN)->defaultValue(true)->end()
                                    ->scalarNode(self::REDIRECT_TO)->defaultValue('?send=true')->end()
                                    ->arrayNode(self::EMAIL)
                                        ->addDefaultsIfNotSet()
                                        ->children()
                                            ->scalarNode(self::EMAIL_SUBJECT)->defaultValue('Password Reset')->end()
                                            ->scalarNode(self::EMAIL_ADMIN_TEMPLATE)->defaultValue(null)->end()
                                            ->scalarNode(self::EMAIL_USER_TEMPLATE)->defaultValue('@SuluCommunity/password-reset-email.html.twig')->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
