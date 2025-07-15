<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sale</title>
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2rem;
        }
        h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 2rem;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: 500;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.3rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 1rem;
            margin-bottom: 0.7rem;
        }
        .btn {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            margin-top: 1rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #1746a2;
        }
        .remove-btn {
            background: #e11d48;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 0.3rem 0.8rem;
            font-size: 1.1rem;
            margin-left: 0.5rem;
            cursor: pointer;
            vertical-align: middle;
        }
        .remove-btn:hover {
            background: #b91c1c;
        }
        .repeater-row {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .repeater-row select, .repeater-row input[type="number"] {
            flex: 1;
            margin-bottom: 0;
        }
        .total-box {
            margin-top: 1.2rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: #2563eb;
            text-align: right;
        }
        .alert {
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .header {
            width: 100%;
            background: #2563eb;
            color: #fff;
            padding: 18px 0 18px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
            padding-left: 40px;
            padding-right: 40px;
        }
        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .header-profile {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-right: 10px;
        }
        .profile-name {
            font-size: 1rem;
            font-weight: 500;
            background: #fff;
            color: #2563eb;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .profile-role {
            font-size: 0.95rem;
            color: #e0e7ef;
            background: #3b82f6;
            padding: 2px 14px;
            border-radius: 12px;
            margin-top: 2px;
        }
        .logout-btn {
            background: #e11d48;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.4rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-left: 1.2rem;
            transition: background 0.2s;
        }
        .logout-btn:hover {
            background: #b91c1c;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            min-width: 320px;
            max-width: 90vw;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12);
        }
        .close-btn {
            background: #e11d48;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 0.3rem 0.8rem;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 1rem;
        }
        .close-btn:hover {
            background: #b91c1c;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="header-title">Pharmacy Management System</div>
    <div class="header-profile">
        <div class="profile-info">
            <div>{{ Auth::user()->name }}</div>
            <div class="profile-role">{{ ucfirst(Auth::user()->role) }}</div>
        </div>
        <div class="profile-name">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
@include('partials.navbar')
<div class="container">
    <h1>Add Sale</h1>
    @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <label>Customer *</label>
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <select name="customer_id" id="customer_id" required style="flex:1;">
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            <button type="button" class="btn" style="padding:0.4rem 1rem; font-size:0.95rem; margin:0;" onclick="showCustomerModal()">Add New</button>
        </div>
        <!-- Customer Modal -->
        <div id="customerModal" class="modal">
            <div class="modal-content">
                <h2 style="margin-top:0; color:#2563eb;">Add New Customer</h2>
                <div id="customerError" style="color:#e11d48; margin-bottom:0.7rem; display:none;"></div>
                <input type="text" id="newCustomerName" placeholder="Customer Name" style="width:100%; padding:0.5rem; margin-bottom:0.7rem; border:1px solid #cbd5e1; border-radius:6px; font-size:1rem;">
                <input type="text" id="newCustomerPhone" placeholder="Phone (optional)" style="width:100%; padding:0.5rem; margin-bottom:0.7rem; border:1px solid #cbd5e1; border-radius:6px; font-size:1rem;">
                <div style="text-align:right;">
                    <button type="button" class="btn" onclick="addCustomer()">Save</button>
                    <button type="button" class="btn" style="background:#e11d48; margin-left:0.5rem;" onclick="closeCustomerModal()">Cancel</button>
                </div>
            </div>
        </div>
        <label>Medicines *</label>
        <div id="repeater">
            <div class="repeater-row">
                <select name="medicines[]" required onchange="updateTotal()">
                    <option value="">Select Medicine</option>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}" data-price="{{ (int) ceil($medicine->price * 1.18) }}">
                            {{ $medicine->name }} (Stock: {{ $medicine->quantity }}, Price: {{ (int) ceil($medicine->price * 1.18) }})
                        </option>
                    @endforeach
                </select>
                <input type="number" name="quantities[]" value="1" min="1" required onchange="updateTotal()">
                <button type="button" class="remove-btn" onclick="removeRow(this)">-</button>
            </div>
        </div>
        <button type="button" class="btn" onclick="addRow()">Add Medicine</button>
        <div class="total-box">Total: <span id="total">0.00</span></div>
        <button type="submit" class="btn">Save Sale</button>
    </form>
    <div style="margin-top:1rem; text-align:center;">
        <a href="{{ route('sales.index') }}">Back to List</a>
    </div>
</div>
<script>
function addRow() {
    const row = document.querySelector('.repeater-row').cloneNode(true);
    row.querySelector('select').selectedIndex = 0;
    row.querySelector('input').value = 1;
    document.getElementById('repeater').appendChild(row);
    updateTotal();
}
function removeRow(btn) {
    const rows = document.querySelectorAll('.repeater-row');
    if (rows.length > 1) {
        btn.parentElement.remove();
        updateTotal();
    }
}
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.repeater-row').forEach(function(row) {
        const select = row.querySelector('select');
        const qty = parseInt(row.querySelector('input').value) || 0;
        const price = select.options[select.selectedIndex].getAttribute('data-price');
        total += (parseFloat(price) || 0) * qty;
    });
    document.getElementById('total').innerText = total.toFixed(2);
}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('repeater').addEventListener('change', updateTotal);
    document.getElementById('repeater').addEventListener('input', updateTotal);
    updateTotal();
});
// Customer modal functions
function showCustomerModal() {
    document.getElementById('customerModal').style.display = 'flex';
    document.getElementById('customerError').style.display = 'none';
    document.getElementById('newCustomerName').value = '';
    document.getElementById('newCustomerPhone').value = '';
}
function closeCustomerModal() {
    document.getElementById('customerModal').style.display = 'none';
}
function addCustomer() {
    var name = document.getElementById('newCustomerName').value.trim();
    var phone = document.getElementById('newCustomerPhone').value.trim();
    var errorDiv = document.getElementById('customerError');
    if (!name) {
        errorDiv.innerText = 'Customer name is required.';
        errorDiv.style.display = 'block';
        return;
    }
    errorDiv.style.display = 'none';
    fetch('/api/customers/quick-add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({ name: name, contact_no: phone })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Add new customer to select
            var select = document.getElementById('customer_id');
            var option = document.createElement('option');
            option.value = data.customer.id;
            option.text = data.customer.name;
            option.selected = true;
            select.appendChild(option);
            closeCustomerModal();
        } else {
            errorDiv.innerText = 'Failed to add customer.';
            errorDiv.style.display = 'block';
        }
    })
    .catch(() => {
        errorDiv.innerText = 'Failed to add customer.';
        errorDiv.style.display = 'block';
    });
}
</script>
</body>
</html>
