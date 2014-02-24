Wiz framework
===================

**使用文檔**

* [安裝](#installation)

**Bundle開發文檔(編輯中)**

* WizAdmintoolsBundle
* WizCmsBundle
* WizFrontendBundle

<a name="installation"></a>

### 安裝

#### 1) 創建項目

```bash
composer create-project wiz/framework-standard-edition . -s dev
```

#### 2) 加載Bundle

選擇所需Bundle,

https://packagist.wizmacau.com/

例如選擇wiz/cms-bundle，添加到composer.json中，

    "require" :  {
        // ...
        "wiz/cms-bundle":"dev-master",
    }

更新，

```bash
composer update wiz/cms-bundle
```

加載到AppKernel.php中，

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Wiz\CmsBundle\WizCmsBundle()
    );
    // ...
}
```

某些Bundle可能需要額外配置或者加載路由，具體請參考下面的安裝文檔。

##### Wiz packagist bundle 安裝文檔

[WizCmsBundle]()

#### 3) 完成部署

```bash
# 更新數據表，請確定app/config/parameter.yml數據參數正確並且數據庫存在
app/console doctrine:schema:update --force

# 創建管理員賬號
app/console fos:user:create --super-admin
```

