<?php

namespace App\Http\Controllers\Traits;

use App\Models\Permission;

trait AuthorizeActionTrait
{
    /**
     * Authorize current action.
     *
     * @param $params the parameters for the policy.
     * @return void
     */
    protected function authorizeAction(array $params = [])
    {
        $params = empty($params) ? [$this->name] : $params;

        $arguments = array_merge([$this->model], $params);

        if($this->getAbility($this->request)) {
            $this->authorize($this->getAbility(), $arguments);
        }
    }

    /**
     * Get the ability for current route action
     *
     * @return sting
     */
    protected function getAbility()
    {
        if(isset($this->resourceAbilityMap()[$this->getActionMethod()])) {
            return $this->resourceAbilityMap()[$this->getActionMethod()];
        }
        return false;
    }

    /**
     * Get current route action.
     *
     * @return string
     */
    protected function getActionMethod()
    {
        return $this->request->route()->getActionMethod();
    }

    /**
     * Register the permissions required by the controller actions.
     *
     * @params array $abilityMap
     * @return void
     */
    protected function registerPermissions(array $abilityMap)
    {
        if(!empty($abilityMap)) {

            $abilities = $this->registrableAbilities($abilityMap);

            Permission::register($this->name, $abilities);
        }
    }

    /**
     * Get the unique abilities from an ability map, excluding index.
     *
     * @param array $abilityMap
     * @return array
     */
     protected function registrableAbilities(array $abilityMap)
     {
        $abilities = array_unique($abilityMap);

        $abilities = array_diff($abilities, ['index']);

        return $abilities;
     }
}