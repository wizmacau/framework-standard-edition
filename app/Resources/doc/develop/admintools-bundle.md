Validator
=================

Example,

---
***JSONFormat***
```yaml
# .../Resources/config/validation.yml
Wiz\DemoBundle\Entity\Demo:
    properties:
        config:
            - Wiz\AdmintoolsBundle\Validator\Constraints\JSONFormat: ~
```

Setting Form
=================
You can add a custom form under menu 'Setting' by applying a few configs.

First, create a form type extended ``Wiz\AdmintoolsBundle\Form\AbstractSettingType`` and add some options just like a normal form but the field name must start with a '_':

```php
namespace Example\Setting\Form;

use Wiz\AdmintoolsBundle\Form\AbstractSettingType;

class ExampleSettingType extends AbstractSettingType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_example_field', 'text', array('required' => true))
            ->add('_another_field', 'integer', array('required' => false))
            ->add('_just_another_field', 'email', array('required' => true))
        ;
    }
}
```

Second, add the form you just created to the service:

```yaml
services:
    ...
    an_example_setting_form_type:
        class: Example\Setting\Form\ExampleSettingType
        calls:
            - [setContainer, [@service_container]]
        tags:
            - { name: wiz.setting, slug: group-account, translation_domain: messages }
    ...
```
