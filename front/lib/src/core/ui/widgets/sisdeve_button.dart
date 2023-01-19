import 'package:flutter/material.dart';

class SisdeveButton extends StatelessWidget {
  final VoidCallback? onPressed; // Função quando for clicada
  final String label; // Nome do Botão
  final double? width; // Largura
  final double height; // Altura
  final Color? color; // Cor

  const SisdeveButton({
    Key? key,
    required this.label,
    required this.onPressed,
    this.width,
    this.height = 50,
    this.color,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: width,
      height: height,
      child: ElevatedButton(
        onPressed: onPressed,
        child: Text(
          label,
          style: const TextStyle(fontSize: 14, fontWeight: FontWeight.bold),
        ),
        style: ElevatedButton.styleFrom(
          shape: const StadiumBorder(),
          backgroundColor: color,
        ),
      ),
    );
  }
}
