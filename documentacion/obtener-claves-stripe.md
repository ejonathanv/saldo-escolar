# Obtener Claves de API de Stripe

Este documento contiene los pasos para obtener las claves de API necesarias para integrar Stripe en la aplicación de SaldoEscolar.

## Requisitos Previos

- Una cuenta de Stripe (https://dashboard.stripe.com/register)

## Pasos para Obtener las Claves

### 1. Crear una Cuenta en Stripe

1. Ve a https://dashboard.stripe.com/register
2. Ingresa tu correo electrónico y crea una contraseña
3. Completa el proceso de verificación de correo electrónico
4. Proporciona la información de tu negocio cuando se te solicite

### 2. Acceder al Panel de Desarrolladores

1. Inicia sesión en tu cuenta de Stripe (https://dashboard.stripe.com)
2. En el menú lateral, busca y haz clic en **Developers** (Desarrolladores)
3. Selecciona **API keys** (Claves de API)

### 3. Obtener las Claves de API

En la página de API keys, verás dos tipos de claves:

#### Clave Publicable (Publishable Key)
- **Nombre de variable**: `STRIPE_KEY`
- **Formato**: `pk_test_xxxxxxxxxxxx` o `pk_live_xxxxxxxxxxxx`
- Esta clave se usa en el frontend (JavaScript)
- Copia la clave que comienza con `pk_test_` para pruebas

#### Clave Secreta (Secret Key)
- **Nombre de variable**: `STRIPE_SECRET`
- **Formato**: `sk_test_xxxxxxxxxxxx` o `sk_live_xxxxxxxxxxxx`
- Esta clave se usa en el backend (servidor)
- **IMPORTANTE**: Nunca compartas esta clave ni la incluyas en código del lado del cliente
- Copia la clave que comienza con `sk_test_` para pruebas

### 4. Configurar las Variables de Entorno

Edita el archivo `.env` en la raíz del proyecto y reemplaza los valores placeholders:

```env
# Stripe
STRIPE_KEY=pk_test_TU_CLAVE_PUBLICA_AQUI
STRIPE_SECRET=sk_test_TU_CLAVE_SECRETA_AQUI
STRIPE_WEBHOOK_SECRET=whsec_TU_WEBHOOK_SECRET_AQUI
```

Reemplaza:
- `pk_test_TU_CLAVE_PUBLICA_AQUI` con tu clave publicable de prueba
- `sk_test_TU_CLAVE_SECRETA_AQUI` con tu clave secreta de prueba

### 5. (Opcional) Configurar Webhooks

Si deseas recibir notificaciones sobre eventos de pago:

1. En el panel de Stripe, ve a **Developers** > **Webhooks**
2. Haz clic en **Add endpoint**
3. Ingresa la URL de tu endpoint:
   - Para desarrollo local, usa una herramienta como ngrok
   - URL típica: `https://tu-dominio.com/webhook/stripe`
4. Selecciona los eventos a escuchar:
   - `payment_intent.succeeded`
   - `payment_intent.payment_failed`
5. Copia el **Webhook secret** generado y agrégalo a tu `.env`:
   ```env
   STRIPE_WEBHOOK_SECRET=whsec_xxxxxxxxxxxx
   ```

## Diferencia entre Modo Prueba y Producción

### Modo Prueba (Test Mode)
- Las claves comienzan con `pk_test_` y `sk_test_`
- No se procesan pagos reales
- Usa tarjetas de prueba proporcionadas por Stripe:
  - Número: `4242 4242 4242 4242`
  - MM/AA: cualquier fecha futura
  - CVC: cualquier 3 dígitos
  - ZIP: cualquier código postal

### Modo Producción (Live Mode)
- Las claves comienzan con `pk_live_` y `sk_live_`
- **Requiere** activar tu cuenta de Stripe
- Procesa pagos reales

## Notas Importantes

1. **Nunca commitees las claves secretas**: El archivo `.env` debe estar en `.gitignore`
2. **Usa claves de prueba para desarrollo**: Nunca uses claves de producción durante el desarrollo
3. **Activa tu cuenta para producción**: Antes de usar claves de producción, completa la verificación de cuenta en Stripe

## Recursos Adicionales

- Documentación oficial de Stripe: https://stripe.com/docs
- Guía de Payments API: https://stripe.com/docs/payments
- Stripe Elements: https://stripe.com/docs/stripe-js
