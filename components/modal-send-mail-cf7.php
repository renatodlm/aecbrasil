<?php add_action('wp_footer', 'mycustom_wp_footer');
function mycustom_wp_footer()
{
?>
    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {
            if ('418' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#modalConfirm').modal('show'); //this is the bootstrap modal popup id
            }
        }, false);
    </script>
<?php  } ?>


<!-- Modal Confirmação -->
<div class="modal fade" style="z-index: 1052;" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="margin-top: 60px; text-align: center;">
                <div class="row">
                    <div class="col-12 justify-content-center" style="margin-bottom: 20px;"><img src="https://victorberbel.work/wp-content/uploads/2019/11/confirmmsg.png" alt=""></div>
                    <div class="col-12">
                        <h2 class="" id="exampleModalLabel">All set!</h2>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-9" style="text-align: center;">
                        <p>Your message was successfully sent and I'll get back to you in <span style="font-family: CalibreSemibold;">24hrs</span>.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="padding: 10px 70px 5px 70px; margin-bottom: 60px;">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>