import 'package:flutter/material.dart';
import 'package:get/utils.dart';

class SisdeveTextformfield extends StatelessWidget {
  final String label; // Nome do Campo
  final TextEditingController? controller; // Controller dos campos
  final bool obscureText; // Se e de senha
  final FormFieldValidator<String>? validator; // Validadores
  final ValueChanged<String>? onChange; //
  final double largura;

  const SisdeveTextformfield({
    Key? key,
    required this.label,
    this.controller,
    this.validator,
    this.onChange,
    this.obscureText = false,
    required this.largura,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: context.widthTransformer(reducedBy: largura!),
      child: TextFormField(
        controller: controller,
        obscureText: obscureText,
        validator: validator,
        onChanged: onChange,
        cursorColor: context.theme.primaryColor,
        decoration: InputDecoration(
          //suffixIcon: Icon(Icons.lock_outline),
          isDense: true,
          labelText: label,
          labelStyle: const TextStyle(color: Colors.black),
          errorStyle: const TextStyle(color: Colors.redAccent),
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(23),
            borderSide: BorderSide(color: Colors.grey[400]!),
          ),
          enabledBorder: OutlineInputBorder(
            borderRadius: BorderRadius.circular(23),
            borderSide: BorderSide(color: Colors.grey[400]!),
          ),
          focusedBorder: OutlineInputBorder(
            borderRadius: BorderRadius.circular(23),
            borderSide: BorderSide(color: Colors.grey[400]!),
          ),
          filled: true,
          fillColor: Colors.white,
        ),
      ),
    );
  }
}
