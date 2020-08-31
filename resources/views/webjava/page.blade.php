<section>
    <div class="container">
		<div class='row'>
            <div class='col-md-12'>
                <center>
                    <h2 class="text-primary"><?php echo $detail['judul']; ?></h2>
                </center>
            </div>
			<div class='col-md-12'>
                <hr style="margin-center: 0;text-align: left;width: 50%;"/>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-6'>
                <center>
                    <img src='<?php echo $detail["header_url"];?>' class='img-responsive'>
                </center>
            </div>
            <div class='col-md-6'>
                <div class="row" style="text-align: justify; text-justify: inter-word;">
                    <?php echo $detail['keterangan']; ?>
                </div>
            </div>
        </div>
    </div>
</section>