create view vw_chumon as
SELECT k. * , o. * , d.qty, k.price * d.qty AS money
FROM tb_order o, tb_order_detail d, tb_drink k
WHERE o.oid = d.oid AND d.dk_id = k.dk_id;

