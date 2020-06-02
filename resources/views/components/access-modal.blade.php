<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">อุปกรณ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="accessories-validation" id="formAccessories" action="{{route('accessories.store')}}"
                    method="POST" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationName">อุปกรณ์</label>
                            <input type="text" class="form-control" id="validationName" placeholder="ชื่ออุปกรณ์"
                                value="" name="name" required>
                            <div class="valid-tooltip">
                                ทำดีแล้ว
                            </div>
                            <div class="invalid-tooltip">
                                ใส่ ชื่ออุปกรณ์ ด้วยจ้า
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationUnit">หน่วย</label>
                            <input type="text" class="form-control" id="validationUnit" placeholder="หน่วย" value=""
                                name="unit" required>
                            <div class="valid-tooltip">
                                ทำดีแล้ว
                            </div>
                            <div class="invalid-tooltip">
                                ใส่ หน่วย ด้วยจ้า
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>