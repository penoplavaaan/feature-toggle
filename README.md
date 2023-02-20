# feature-toggle
Feature toggle support for gitlab 

Installation steps:

1)
```composer
composer require penoplavaaan/feature-toggle
  ```

2) Add _```Penoplavaan\FeatureToggleWrapper\Providers\FeatureToggleServiceProvider::class```_ to ```config/app.php``` ```providers```array
3) Add ```FeatureToggle``` alias to ```config/app.php``` ```aliases``` array
    - ```'FeatureToggle' => Penoplavaan\FeatureToggleWrapper\FeatureToggle\FeatureToggleFacade::class```

