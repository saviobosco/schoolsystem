<?= $this->assign('title',$title); ?>
<div class="row m-t-20">
    <div class="col-sm-12">
        <?php if($pins): ?>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th> Serial Number</th>
                    <th> Pin</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($pins as $pin): ?>
                    <tr>
                        <td><?= $pin->serial_number ?></td>
                        <td><?= $pin->pin ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>