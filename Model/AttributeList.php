<?php
/**
 *    This file is part of the module jxAttrEdit for OXID eShop Community Edition.
 *
 *    jxAttrEdit for OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    jxAttrEdit for OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://github.com/job963/jxAttrEdit
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) Joachim Barthel 2012-2017
 *
 */

namespace Job963\Oxid\AttrEdit\Model;

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\TableViewNameGenerator;

class AttributeList extends AttributeList_parent
{

    public function loadAttributes($sArticleId, $sParentId = null)
    {
        if ($sArticleId) {
            $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
            $TableViewNameGenerator = Registry::get(TableViewNameGenerator::class);

            $sAttrViewName = $TableViewNameGenerator->getViewName('oxattribute');
            $sViewName = $TableViewNameGenerator->getViewName('oxobject2attribute');

            $sSelect = "select {$sAttrViewName}.`oxid`, {$sAttrViewName}.`oxtitle`, o2a.`oxvalue` from {$sViewName} as o2a ";
            $sSelect .= "left join {$sAttrViewName} on {$sAttrViewName}.oxid = o2a.oxattrid ";
            $sSelect .= "where o2a.oxobjectid = '%s' and o2a.oxvalue != '' ";
            $sSelect .= "order by o2a.oxpos, {$sAttrViewName}.oxpos";

            $aAttributes = $oDb->getAll(sprintf($sSelect, $sArticleId));

            if ($sParentId) {
                $aParentAttributes = $oDb->getAll(sprintf($sSelect, $sParentId));
                $aAttributes = $this->_mergeAttributes($aAttributes, $aParentAttributes);
            }

            $this->assignArrayjx($aAttributes);
        }
    }

    protected function assignArrayjx($aData)
    {
        $this->clear();
        if (count($aData)) {
            $oSaved = clone $this->getBaseObject();

            foreach ($aData as $aItem) {
                $oListObject = clone $oSaved;
                $this->_assignElement($oListObject, $aItem);

                $this->_aArray[] = $oListObject;
            }
        }
    }
}
