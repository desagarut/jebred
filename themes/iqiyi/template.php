<!DOCTYPE html>
<html lang="en">
<script>
    window.perFirstStartTime = window.performance.now()
</script>

<?php $this->load->view($folder_themes . '/head') ?>
<?php $this->load->view($folder_themes . '/body') ?>

<script src="https://accounts.google.com/gsi/client" async="" defer=""></script>
<script defer="" type="text/javascript" src="//static.iqiyi.com/lequ/20220714/global_pcw_qa_v11.min.js"></script>
<script>
    if (!window.scrollTo) {
        window.scrollTo = function(option) {
            window.scrollLeft = option.left;
            window.scrollTop = option.top
        }
    }
    if (!document.body.scrollTo) {
        Element.prototype.scrollTo = function(option) {
            this.scrollLeft = option.left;
            this.scrollTop = option.top
        }
    }
</script>

</html>