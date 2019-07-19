@extends('layout')

@section('title', 'Terms and Conditions')

@section('extra-css')
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Terms and Conditions</span>
    @endcomponent

    <div class="terms-conditions-container container">
        <h1 class="terms-conditions-title">Terms and conditions</h1>
        <p>
            We reserve the right to change the terms and conditions of sales. Any changes will be in effect from the moment they are
            published on our website and will refer to the sales made from that moment on.<br>
            Premise.
        </p>
        <p>
            The business relations between BarQualified and its clients are exclusively regulated by the following terms and conditions,
            which exclude and outweigh any stipulation agreed previously or verbally.
        </p>
        <ol start="1">
            <li>
                <label>Technical information</label>
                <p>
                    The technical information published in our catalog is based exclusively on the official data published by the manufacturers. We
                    reserve the right to modify the technical and dimensional parameters on the basis of any changes in product.
                </p>
            </li>
            <li>
                <label>Shipping and Delivery</label>
                <p>If you have chosen to have your package shipped directly to your home, upon delivery by the carrier please verify that:</p>
                <ul>
                    <li>The number of packages delivered corresponds to that indicated on the accompanying document.</li>
                    <li>The packages are intact and not damaged in any way.</li>
                    <li>The identity and quality of products indicated on the packaging are the same as those indicated on the invoice.</li>
                    <li>The invoice will be sent via email and must be kept.</li>
                    <li>If the parcels do not correspond to the ones on the accompanying document, or any of the items are missing, damaged
                        or lost this should be immediately reported to the carrier.</li>
                </ul>
                <p>
                    We are committed to handing over the product(s) to the carrier as quickly as possible. We will do our best to help you receive
                    your products within the time and date stated, but we are not responsible for damages or tardiness on the part of the carrier.<br>
                    All stocked items will be dispatched within 1-4 business days. (Please Note: Packing/Shipping times are shown as a guide.<br>
                    Please allow extra time for peak seasons including Diwali, Christmas/NYE)<br>
                    If there are any issues or delays with your order you will be contacted immediately.<br>
                    The Standard Rate Delivery charges do not apply for glassware and for larger items, including cool rooms, garbage bins, glass
                    chillers, glass washers, ice machines, ice storage, and refrigerators. Shipping for these items is POA (price on application).<br>
                    If you live in remote area, have ordered bulky items or a combination of many items we will contact you and advise the extra
                    delivery charges.
                </p>
            </li>
            <li>
                <label>Risk and Ownership</label>
                <p>
                    The goods are shipped to the assigned/indicated destination (shipping costs are listed on the invoice). BarQualified is not
                    responsible for damage during shipping. Always check the integrity of the packaging at the moment of delivery.
                </p>
            </li>
            <li>
                <label>Return of goods</label>
                <ul>
                    <li>products can be returned within 7 days from the date of delivery in case of wrong products &amp; wrong sizes</li>
                    <li>payment refunds are applicable ‘only’ in case of incorrect product delivery.</li>
                    <li>replacement of products will be done free of cost if wrong products (incomplete sets or incorrect style), wrong size (size other
                        than that ordered) or damaged products are received by the customer.</li>
                </ul>
                <p>
                    The return of goods from BarQualified must be reported first via email or letter within 7 days of delivery. The email or letter
                    must indicate the problem(s) with the item and identify the product by using the details provided in the invoice. Wait for the
                    written authorization before returning the goods. The goods should be properly packaged and shipped to the address of the
                    company.
                </p>
            </li>
            <li>
                <label>Complaints</label>
                <p>
                    Any packaging errors or missing materials should be promptly reported to BarQualified, citing the invoice or order number. If
                    the parcels do not correspond to the ones on the accompanying document, or any of the items are missing, damaged or lost
                    this should be immediately reported to the carrier and us within 24 hours of receiving the delivery. After investigating the
                    problem, we will send you the billed amount immediately but customer will have to bear the shipping cost.
                    BarQualified will not be held accountable for the misuse of any products. BarQualified makes every effort to ensure that your
                    package is packed and shipped correctly. However, from time to time, occasional errors are made. If you received damaged,
                    defective or incorrect products, it must be reported within 7 days of delivery. Please note: Photographic evidence will be
                    required for any problems with your order. Problems reported after 7 days of delivery may be disqualified for replacements or
                    refunds. We may request that the incorrect item be returned to us at our expense. If the item is not returned, you may be
                    charged for the incorrect item.
                </p>
            </li>
            <li>
                <label>Methods of payment and delivery</label>
                <p>
                    The client can choose between the methods of payment and shipping options cited on our website. Payment and delivery
                    methods that are not listed on our website are not accepted. The products are sold at the prices listed on our website until they
                    are modified.
                </p>
            </li>
            <li>
                <label>Acceptance of Orders</label>
                <p>
                    You must be 18 years or older to purchase. Orders will be considered binding only when the client receives a confirmation email
                    from us stating that the payment has been authorized and the products are available and in stock. We advise the client to keep
                    the confirmation email. If a confirmation email is not received, we kindly ask the client to mail us at
                    <a href="mailto:contactus@barqualified.com">contactus@barqualified.com</a>
                </p>
                <p>
                    The Site sells products which may be useable by children. However, such products are intended for purchase by adults only. The
                    Site cannot prohibit minors from visiting this Site. We must rely on parents, guardians and those responsible for supervising
                    minors under the age of 18 to decide which materials are appropriate for such children to purchase. If you are under 18 years
                    of age, you may submit personal information (name, address, phone number, etc.) only with a parent or guardian&#39;s
                    participation and permission. If you provide any personal information such as address, credit card number or any other
                    personal information, you confirm that you are over the age of 18 or have parental-guardian participation and permission.
                </p>
            </li>
            <li>
                <label>Order Processing</label>
                <p>
                    Orders are normally shipped within 48-72 hours of receipt. Orders placed on Friday, Saturday, Sunday or Public Holidays will be
                    shipped on the following business day. If there is a delay in your order, we will notify you by phone or email regarding your
                    order. BarQualified is under no obligation to dispatch orders within a certain time frame, however will endeavor to dispatch all
                    orders as soon as possible.
                </p>
            </li>
            <li>
                <label>Exchanges</label>
                <ul>
                    <li>Items can be exchanged for a similar size or a different size if wrong product is delivered.</li>
                    <li>intimate us on email at - within 7 days from date of delivery. The details of the return (bill , order no. courier docket no and
                        reason for return) should be shared to us by email.</li>
                </ul>
                <p>&nbsp;</p>
            </li>
            <li>
                <label>Right Of Withdrawal and Cancellation Policy</label>
                <p>
                    An easy cancellation policy is available for all our esteemed customers if the payment is made already. You can cancel your
                    order before the product has been shipped. Your entire order amount will be refunded.
                    The consumer has the right to rescind the contract within 7 business days of delivery by notifying us through registered
                    mail and indicating the preferred refund method with the order details and bill. Within 7 business days from the moment the
                    client has communicated their withdrawal, they will have to return the products in their original packaging. A refund will be
                    given within and no later than 7 business days from the day you communicated your withdrawal.</p>
            </li>
            <li>
                <label>Out Of Stock / Back Orders</label>
                <p>
                    With a catalog of products this large, there are rare occurrences where our warehouse has run out of stock on an item before it
                    is disabled online. If you have successfully ordered a product that is out of stock, we will automatically refund you the cost of
                    that product and ship the remainder of that product if applicable.<br>
                    Although every attempt is made to maintain inventory of each product we offer, occasionally we may run out of certain
                    models. If any product is not available for shipment, we will contact you by email with up-to-date delivery information. Some
                    items are manufactured to order and will have at times an extended lead time.
                </p>
            </li>
            <li>
                <label>Pricing &amp; Availability Policy</label>
                <p>
                    Prices and availability are subject to change without notice. Errors will be corrected on the Site where discovered, and
                    BarQualified reserves the right to revoke any stated offer and to correct any errors, inaccuracies or omissions (including after an
                    order has been submitted).
                </p>
            </li>
            <li>
                <label>Guarantee and assistance</label>
                <p>
                    We guarantee that the products are exempt from defects and conform to the norms of the Indian Union. In the unlikely event
                    that a product has been subject to damage, you must inform us as soon as possible, and within seven days of delivery by
                    sending us a letter through registered mail with return receipt. For any kind of assistance you can contact us at customer
                    services.<br>
                    BarQualified is proud to offer a Satisfaction Guarantee! If, for any reason, you are unsatisfied with the products you received,
                    A return requests must be submitted within 7 days of product delivery. Once we confirm with our team, the products must be
                    received back to us, in original condition, within 30 days. Returns will not be accepted unless they are complete. All original
                    boxes, packing materials, parts, components and pieces must be returned to us for a return to be processed. Returns will not be
                    granted without all of the products original packaging and parts. ALL associated shipping fees are non-refundable. We do not
                    issue return labels for returns or exchanges.
                </p>
            </li>
            <li>
                <label>Copyright</label>
                <p>
                    The Site is owned and operated by BarQualified. All materials and items on this Site, including, but not limited to, text, graphics,
                    logos, design, icons, and images, are the property of BarQualified, or its content suppliers, and is protected by Indian and
                    international copyright laws. Except as stated herein, none of the material may be used, copied, distributed, downloaded,
                    displayed, transmitted in any form or by any means, without the prior written permission of BarQualified Site visitors may copy
                    and download the materials on this Site for personal, non-commercial use only, provided they do not change the materials, and
                    they retain all copyright and proprietary notices in the materials.
                </p>
            </li>
            <li>
                <label>Responsibility for Shipping Charges</label>
                <p>
                    Orders that are refused, unclaimed, and returned to us, will still be obligated to pay the original shipping and handling fee.
                    Please note, once an order has left our location, shipping and handling is a non-refundable fee. All shipments are made on the
                    following basis.
                    All deliveries are made to kerbside (or dock) of delivery Address in the metropolitan area of your capital city, only. The
                    purchaser acknowledges that it is their responsibility to provide labour and equipment to unload and position the goods on site
                    at the purchasers expense. For deliveries outside the metropolitan areas listed, all transport is at the purchasers expense and
                    must be organised by the purchaser. Transport costs for some suppliers is free.
                    Transport costs, where applicable, are included in the order form. Insurance for goods in transit is not included in the purchase
                    price. If insurance is required by the purchaser, it must be arranged by the purchaser either direct with the carrier or their
                    insurance agent. Purchase price does not include unpacking, placement or positioning of equipment or connection to services
                    or removal of rubbish and packing crates.
                </p>
            </li>
            <li>
                <label>Legal notes</label>
                <p>All contracts are subject to Indian law.</p>
            </li>
            <li>
                <label>Competence</label>
                <p>
                    Mumbai has jurisdiction over all disputes.<br>
                    For any further clarifications, please do not hesitate to contact our main office at the following address:<br>
                    Gala No. 27, Blue Rose Industrial Estate,<br>
                    Off Western Express Highway,<br>
                    Borivali East, Mumbai-400062,<br>
                    Maharashtra – India.<br>
                    E-mail: <a href="mailto:contactus@barqualified.com">contactus@Barqualified.com</a>
                </p>
            </li>
        </ol>
    </div>
@endsection

@section('extra-js')
@endsection
