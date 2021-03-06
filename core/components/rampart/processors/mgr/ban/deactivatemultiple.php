<?php
/**
 * Rampart
 *
 * Copyright 2011 by Shaun McCormick <shaun@modx.com>
 *
 * Rampart is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Rampart is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Rampart; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package rampart
 */
/**
 * Deactivate multiple Bans
 *
 * @package rampart
 * @subpackage processors
 */
if (empty($scriptProperties['bans'])) {
    return $modx->error->failure($modx->lexicon('rampart.ban_err_ns'));
}

$banIds = explode(',',$scriptProperties['bans']);

foreach ($banIds as $banId) {
    $ban = $modx->getObject('rptBan',$banId);
    if ($ban == null) continue;

    $ban->set('active',false);

    if ($ban->save() === false) {
        return $modx->error->failure($modx->lexicon('rampart.ban_err_save'));
    }
}

return $modx->error->success();
