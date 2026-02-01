INSERT INTO roles
(nombre, descripcion, activo, created_at, updated_at)
VALUES
('Administrador', 'Control total del sistema', 1, NOW(), NOW()),
('Empleado', 'Acceso operativo al sistema administrativo', 1, NOW(), NOW()),
('Cliente', 'Acceso del cliente para consultar pedidos, citas y compras', 1, NOW(), NOW());
INSERT INTO sucursales
(id_sucursal, nombre, direccion, telefono, activo, created_at, updated_at)
VALUES
(
  'suc-monterrey-20260131212230',
  'Monterrey',
  'Monterrey, Nuevo León',
  '8180000001',
  1,
  NOW(),
  NOW()
),
(
  'suc-ciudad-de-mexico-20260131212230',
  'Ciudad de México',
  'Ciudad de México',
  '5550000002',
  1,
  NOW(),
  NOW()
),
(
  'suc-guadalajara-20260131212230',
  'Guadalajara',
  'Guadalajara, Jalisco',
  '3330000003',
  1,
  NOW(),
  NOW()
),
(
  'suc-toluca-20260131212230',
  'Toluca',
  'Toluca, Estado de México',
  '7220000004',
  1,
  NOW(),
  NOW()
);
INSERT INTO productos
(id_producto, nombre, descripcion, precio, moneda, imagen_url, activo, created_at, updated_at)
VALUES
(
  'PRO-CEJAS',
  'Cejas',
  'Perfilado y arreglo de cejas',
  50.00,
  'MXN',
  'https://drive.google.com/uc?id=1bpvkBN552aM8B40yaCWhPKjBJyzs7039',
  1,
  NOW(),
  NOW()
),
(
  'PRO-FACIAL',
  'Facial',
  'Tratamiento facial básico',
  200.00,
  'MXN',
  'https://drive.google.com/uc?id=1l7ZTG5yyN0C0DWdhcEql_kwS79qrQYD_',
  1,
  NOW(),
  NOW()
),
(
  'PRO-BARBA',
  'Barba',
  'Arreglo y perfilado de barba',
  120.00,
  'MXN',
  'https://drive.google.com/uc?id=1xYbmpvGaKOYPZBG8B8upOhIZWoLDM-N-',
  1,
  NOW(),
  NOW()
),
(
  'PRO-CORTE-NINO',
  'Corte niño',
  'Corte de cabello para niño',
  100.00,
  'MXN',
  'https://drive.google.com/uc?id=1tieT_uCYasWfPIg6yupr31RVy0gXtCKJ',
  1,
  NOW(),
  NOW()
),
(
  'PRO-CERA',
  'Cera para cabello',
  'Aplicación de cera para peinado',
  40.00,
  'MXN',
  'https://drive.google.com/uc?id=1b_H0gfBTcHhXu_UWcUkNwd7OePxwIcdb',
  1,
  NOW(),
  NOW()
),
(
  'PRO-NAVAJA',
  'Corte a navaja',
  'Corte tradicional con navaja',
  180.00,
  'MXN',
  'https://drive.google.com/uc?id=1HZjHWKZ_DumMRbljU_z0dRXaMIH46cm6',
  1,
  NOW(),
  NOW()
),
(
  'PRO-KIT',
  'Kit completo',
  'Servicio completo de barbería',
  300.00,
  'MXN',
  'https://drive.google.com/uc?id=12_r7bbty5pw1OlDsxOWdULneuCyBgi1s',
  1,
  NOW(),
  NOW()
),
(
  'PRO-ADULTO',
  'Corte adultos',
  'Corte de cabello para adulto',
  150.00,
  'MXN',
  'https://drive.google.com/uc?id=1R5zeXUlWVylf8eX8mpoqML6aqO26fMDM',
  1,
  NOW(),
  NOW()
);
