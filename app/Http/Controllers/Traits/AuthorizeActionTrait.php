<?php

namespace App\Http\Controllers\Traits;

trait AuthorizeActionTrait
{
    /**
     * Authorize current action.
     *
     * @param $params the parameters for the policy.
     * @param $ability the ability related to the action.
     * @return void
     */
    protected function authorizeAction(array $params = [], $ability = null)
    {
        if (auth()->user()->id === config('user.superuser')) return;

        $params = empty($params) ? [$this->name] : $params;

        $arguments = array_merge([$this->model], $params);

        if ($ability != null) {

            $this->authorize($ability, $arguments);

        } elseif($this->getAbility($this->request)) {
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
}