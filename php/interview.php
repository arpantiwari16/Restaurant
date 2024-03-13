select * from employee where salary>=50000;

select user_id,employee.user_name,count(*) as num_leaves from leaves join employee 
on leaves.id=employee.id where leaves.id=4;

1) products 
2) users 
3) sellers 
4)payments
5)deliver_status
6)carts 
7)delivered_item
8)pending_orders
9)stocks




