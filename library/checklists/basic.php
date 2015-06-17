<?php
/*
Checklist functions:
create
read
update
destroy
note
attach to site
attach to fields
stamp action with user
*/

/*
modules for each checklist item:
required: user, date, status, notes, description,id
optional: attached site field, related references

Samples:
$checklistItem->user = get_current_user_id()

$checklistItem->status = 'complete'

$checklistItem->linkField('_site_ftp_ip_address')
$checklistItem->updateField('_site_ftp_ip_address','192.168.1.0') //Probably preferred, item can set value of anything it needs to

$checklist->check($itemID)//e.g. $itemID = 'folder_setup'

$developmentChecklist = new checklist('development')//instatiates checklist with development items that can be accessed via id
*/

/*



When site is created with development category, generate pre-development checklist

When pre-development is complete, generate development checklist

When development checklist is complete, generate pre-release checklist

when pre-release checklist is complete, generate release checklist

when release checklist is complete, generate sweep checklist, activate Cron for sweep & security, set variable to indicate that the "new sweep" & "new sec & bak" & "new audit" & "new maintenance"
*/

?>
