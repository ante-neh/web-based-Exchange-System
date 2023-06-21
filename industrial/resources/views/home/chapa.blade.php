<h3>Buy your product</h3>
<form method="POST" action="{{ route('pay',$totalPrice) }}" id="paymentForm">
    @csrf
    <input type="submit" value="Buy" />
</form>
