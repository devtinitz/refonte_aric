import os
import re
import glob

def patch_logo(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content

    # 1. Navbar Logo
    # Need to match the whole block carefully. It usually spans multiple lines.
    navbar_logo_pattern = re.compile(
        r'<!-- Logo -->\s*<a href="./" class="flex items-center space-x-3 shrink-0">\s*<div class="w-10 h-10 bg-tech-cyan p-2 rounded-xl neon-glow">.*?</svg>\s*</div>\s*<span class="text-2xl font-extrabold tracking-tighter text-tech-navy">ARIC<span class="text-tech-cyan">\.</span></span>\s*</a>',
        re.DOTALL
    )
    new_navbar_logo = """<!-- Logo -->
            <a href="./" class="flex items-center shrink-0 transition-transform hover:scale-105">
                <img src="logo.png" alt="ARIC Solutions Logo" class="h-12 w-auto drop-shadow-sm">
            </a>"""
    content = navbar_logo_pattern.sub(new_navbar_logo, content)

    # 2. Mobile Menu Logo
    mobile_logo_pattern = re.compile(
        r'<div class="flex justify-between items-center mb-12">\s*<span class="text-2xl font-extrabold tracking-tighter text-tech-navy">ARIC<span class="text-tech-cyan">\.</span></span>',
        re.DOTALL
    )
    new_mobile_logo = """<div class="flex justify-between items-center mb-12">
                    <img src="logo.png" alt="ARIC Solutions Logo" class="h-10 w-auto drop-shadow-sm">"""
    
    # 3. Footer Logo
    footer_logo_pattern = re.compile(
        r'<div class="text-2xl font-extrabold tracking-tighter text-tech-navy mb-8">ARIC<span class="text-tech-cyan">\.</span></div>',
        re.DOTALL
    )
    new_footer_logo = """<img src="logo.png" alt="ARIC Solutions Logo" class="h-14 w-auto mb-8 drop-shadow-sm">"""

    content = mobile_logo_pattern.sub(new_mobile_logo, content)
    content = footer_logo_pattern.sub(new_footer_logo, content)

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Logo patched successfully in {filepath}")
    else:
        print(f"No changes made to {filepath} (logo string not found).")

if __name__ == '__main__':
    html_files = glob.glob('/Users/mac/DOSSIER_MOSES/TINITZ/refonte_aric/*.html')
    for file in html_files:
        try:
            patch_logo(file)
        except Exception as e:
            print(f"Error patching {file}: {e}")
