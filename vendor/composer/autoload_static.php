<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5794622d778f7f84fa4bbdb46ee6b6e6
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Banking\\Services\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Banking\\Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Banking\\Services\\Account\\BaasWallet' => __DIR__ . '/../..' . '/src/Account/BaasWallet.php',
        'Banking\\Services\\Account\\BaasWalletTransaction' => __DIR__ . '/../..' . '/src/Account/BaasWalletTransaction.php',
        'Banking\\Services\\ApiRequest\\BaasCommunication' => __DIR__ . '/../..' . '/src/ApiRequest/BaasCommunication.php',
        'Banking\\Services\\Auth\\BaasSignature' => __DIR__ . '/../..' . '/src/Auth/BaasSignature.php',
        'Banking\\Services\\BankingServiceProvider' => __DIR__ . '/../..' . '/src/BankingServiceProvider.php',
        'Banking\\Services\\Contracts\\BaasDigitalSignature' => __DIR__ . '/../..' . '/src/Contracts/BaasDigitalSignature.php',
        'Banking\\Services\\Contracts\\BaasableCommunication' => __DIR__ . '/../..' . '/src/Contracts/BaasableCommunication.php',
        'Banking\\Services\\Contracts\\BaasableIPN' => __DIR__ . '/../..' . '/src/Contracts/BaasableIPN.php',
        'Banking\\Services\\Contracts\\BaasableWallet' => __DIR__ . '/../..' . '/src/Contracts/BaasableWallet.php',
        'Banking\\Services\\Contracts\\BaasableWalletTransaction' => __DIR__ . '/../..' . '/src/Contracts/BaasableWalletTransaction.php',
        'Banking\\Services\\Traits\\BaasAccount' => __DIR__ . '/../..' . '/src/Traits/BaasAccount.php',
        'Banking\\Services\\Traits\\BaasTransaction' => __DIR__ . '/../..' . '/src/Traits/BaasTransaction.php',
        'Banking\\Services\\Traits\\Baasable' => __DIR__ . '/../..' . '/src/Traits/Baasable.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5794622d778f7f84fa4bbdb46ee6b6e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5794622d778f7f84fa4bbdb46ee6b6e6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5794622d778f7f84fa4bbdb46ee6b6e6::$classMap;

        }, null, ClassLoader::class);
    }
}
