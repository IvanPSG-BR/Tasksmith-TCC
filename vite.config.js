import { defineConfig } from 'vite';
import usePHP from 'vite-plugin-php';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
	plugins: [
        usePHP(
            {
                entry: [
                    'index.php'
                ],
                rewriteUrl(requestUrl) {
                    if (['.js', '.css', '.png', '.jpg', '.jpeg', '.gif', '.svg', '.ico', '.webp', '.woff', '.woff2', '.ttf', '.eot'].some((s) => requestUrl.pathname.includes(s))) {
                        return;
                    }

                    if (requestUrl.pathname === '/' || requestUrl.pathname === '/index.php') {
                        return;
                    }

                    requestUrl.search = 'url=' + requestUrl.pathname.slice(1);
                    requestUrl.pathname = 'index.php';

                    return requestUrl;
                }
            }
        ),
        tailwindcss()
    ],
});