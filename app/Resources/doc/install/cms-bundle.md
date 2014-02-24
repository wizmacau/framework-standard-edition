WizCmsBundle安裝
---------

### Step 1) 獲取代碼

將wiz/cms-bundle加入composer.json中，

    "require" :  {
        // ...
        "wiz/cms-bundle": "dev-master",
        // ...
    }
    
升級composer獲取模塊代碼

```bash
composer update wiz/cms-bundle
```

### Step 1) 將代碼文件加載到AppKernel中

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        
        // ...
    );
    // ...
```

> **注意:** 由於WizCmsBundle會自動加載所需其它依賴的Bundle文件，所以請確保除了WizCmsBundle，你的AppKernel已加載以下依賴文件。
