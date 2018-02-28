<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $order->enterprise_order_number }}
        </h3>
    </div>

    <div class="panel-body">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4">
                    <b>Customer:</b>
                    {{ $order->customer->name }}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">

                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <b>Borrowers:</b>
                    @foreach($order->borrowers as $borrower)
                        {{ $borrower->name }} <br>
                    @endforeach
                </div>
            </div>

        </div> <!-- ./col-lg-12 -->
    </div> <!-- ./panel-body -->
</div ><!-- ./panel -->