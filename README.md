# feature-toggle
Feature toggle support for gitlab 

```composer
composer require penoplavaaan/feature-toggle
```

- Add _```FeatureToggleServiceProvider```_ to ```config/app.php``` ```providers```array
- Add ```FeatureToggle``` alias to ```config/app.php``` ```aliases``` array
    - ```'FeatureToggle' => Penoplavaan\FeatureToggle\FeatureToggleFacade::class```

