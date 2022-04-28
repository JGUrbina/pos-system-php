<?php 

    class Modal {
        static function header($text, $color) {
            return '<div class="modal-header" style="background-color: '. $color .'; color: white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">'. $text .'</h4>
                    </div>';
        }

        static function footer() {
            return '<div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                    </div>';
        }
    }