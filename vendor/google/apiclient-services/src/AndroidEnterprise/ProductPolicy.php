<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AndroidEnterprise;

class ProductPolicy extends \Google\Collection
{
  protected $collection_key = 'tracks';
  protected $autoInstallPolicyType = AutoInstallPolicy::class;
  protected $autoInstallPolicyDataType = '';
  public $autoUpdateMode;
  protected $managedConfigurationType = ManagedConfiguration::class;
  protected $managedConfigurationDataType = '';
  public $productId;
  public $trackIds;
  public $tracks;

  /**
   * @param AutoInstallPolicy
   */
  public function setAutoInstallPolicy(AutoInstallPolicy $autoInstallPolicy)
  {
    $this->autoInstallPolicy = $autoInstallPolicy;
  }
  /**
   * @return AutoInstallPolicy
   */
  public function getAutoInstallPolicy()
  {
    return $this->autoInstallPolicy;
  }
  public function setAutoUpdateMode($autoUpdateMode)
  {
    $this->autoUpdateMode = $autoUpdateMode;
  }
  public function getAutoUpdateMode()
  {
    return $this->autoUpdateMode;
  }
  /**
   * @param ManagedConfiguration
   */
  public function setManagedConfiguration(ManagedConfiguration $managedConfiguration)
  {
    $this->managedConfiguration = $managedConfiguration;
  }
  /**
   * @return ManagedConfiguration
   */
  public function getManagedConfiguration()
  {
    return $this->managedConfiguration;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setTrackIds($trackIds)
  {
    $this->trackIds = $trackIds;
  }
  public function getTrackIds()
  {
    return $this->trackIds;
  }
  public function setTracks($tracks)
  {
    $this->tracks = $tracks;
  }
  public function getTracks()
  {
    return $this->tracks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductPolicy::class, 'Google_Service_AndroidEnterprise_ProductPolicy');
