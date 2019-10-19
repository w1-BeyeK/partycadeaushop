<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10/19/2019
 * Time: 6:05 PM
 */
?>
<div class="modal fade" data-id="" id="menuItemModal" role="dialog" aria-labelledby="menuItemModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="menuItemForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuItemLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="margin-top:-24px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Titel</label>
                        <input class="form-control" name="title" id="title"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Url</label>
                        <input class="form-control" name="url" id="url"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submitMenuItem" data-dismiss="modal">Opslaan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                </div>
            </form>
        </div>
    </div>
</div>
