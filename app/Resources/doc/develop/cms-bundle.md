# WizToolsBundle Document

## Doctrine2 behavior extension

### Lifecycleable

yaml配置文件實例

```
---
Wiz\CmsBundle\Entity\News:
    type: entity
    table: wiz_news
    repositoryClass: Wiz\CmsBundle\Repository\NewsRepository
    id:
        id:
            column: id
            type: integer
            generator:
                strategy: AUTO
    fields:
        onlineAt:
            type: datetime
            nullable: true
            wiz:
                lifecycleable:
                    type: online
        offlineAt:
            type: datetime
            nullable: true
            wiz:
                lifecycleable:
                    type: offline
```

**注意:** 啟用此功能需要將 LifecycleableFilter 加入到Doctrine配置的Filters選項中。

在 app/config/config.yml 中加入

```
---
doctrine:
    ...
    orm:
        auto_generate_proxy_classes: "%kernel.debug%"
        auto_mapping: true
        filters:
            lifecycle:
                class: Wiz\ToolsBundle\Doctrine\Extension\Lifecycleable\Filter\LifecycleableFilter
                enabled: true
```

程式會自動在DQL中加入Lifecycleable做為檢索條件，如果需要臨時關閉該功能，可在檢索條件中加入

``` php
<?php
...
$em = $this->container->get('doctrine')->getManager();
$em->getFilters()->disable("locale");
...
?>
```