<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="takeModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เบิก อุปกรณ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="take-validation" id="formTake" action="{{route('take.store')}}" method="POST"
                    novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-md-5 mb-3">
                            <label for="validationAccess">อุปกรณ์</label>
                            <select class="form-control" name="access_id" id="validationAccess" required>
                                <option value="">---เลือก---</option>
                                @foreach ($accessories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="valid-tooltip">
                                ทำดีแล้ว
                            </div>
                            <div class="invalid-tooltip">
                                เลือก อุปกรณ์ ด้วยจ้า
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationQty">จำนวน</label>
                            <input class="form-control" type="number" id="validationQty" value="" name="qty"
                                required>
                            <div class="valid-tooltip">
                                ทำดีแล้ว
                            </div>
                            <div class="invalid-tooltip">
                                ใส่ จำนวน ด้วยจ้า
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="validationTakeName">ชื่อผู้เบิก</label>
                            <select class="form-control" name="user_take" id="validationTakeName" required>
                                <option value="">---เลือก---</option>
                                @foreach ($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <div class="valid-tooltip">
                                ทำดีแล้ว
                            </div>
                            <div class="invalid-tooltip">
                                เลือก อุปกรณ์ ด้วยจ้า
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-12">
                            <label for="remark">Remark</label>
                            <textarea class="form-control" name="remark" id="remark" rows="5"></textarea>
                        </div>
                        <div class="valid-tooltip">
                            ทำดีแล้ว
                        </div>
                        <div class="invalid-tooltip">
                            เลือก วันที่เบิก ด้วยจ้า
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="created_at">วันที่เบิก</label>
                            <input type="datetime" class="form-control" name="created_at" id="created_at"
                                value="{{date('Y-m-d')}}" disabled>
                        </div>
                        <div class="valid-tooltip">
                            ทำดีแล้ว
                        </div>
                        <div class="invalid-tooltip">
                            เลือก วันที่เบิก ด้วยจ้า
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