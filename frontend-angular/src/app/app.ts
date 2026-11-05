import { Component, OnInit, inject, signal } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductService, Product } from './services/product';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App implements OnInit {
  private productService = inject(ProductService);
  
  // Usamos una señal para reactividad automática
  products = signal<Product[]>([]);

  ngOnInit(): void {
    this.productService.getProducts().subscribe({
      next: (data) => {
        console.log('Productos recibidos:', data);
        this.products.set(data);
      },
      error: (err) => {
        console.error('Error al conectar con la API de Laravel:', err);
      }
    });
  }
}