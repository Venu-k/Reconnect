@extends('layouts.user')


@section('mainBody')
    @parent
    <div class="divMainBodyNoLeftRight" id="divMainBody">
        <div class="divForm">

            <div class="divMainGridHeading">
            Special Incentives
            </div>
            <div>
            <table class="divGrid" cellspacing="0" rules="all" border="1" id="mainBody_gridSummary" style="border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th scope="col">Week</th><th scope="col">Amount</th><th scope="col">Admin Charges</th><th scope="col">TDS</th><th scope="col">Payment</th>
                    </tr>
                    <tr>
                        <td>
                        2012 - 5 (29-01-2012 to 08-02-2012)
                        </td>
                        <td>
                        Rs. 0.00
                        </td>
                        <td>
                        Rs. 0.00
                        </td>
                        <td>
                        Rs. 0.00
                        </td>
                        <td>
                        Rs. 0.00
                        </td>
                    </tr>

                </tbody>
            </table>
            </div>

        </div>
    </div>
    

@stop