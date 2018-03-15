import qrcode
qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_L,
    box_size=10,
    border=4,
)
qr.add_data('CSE325:OPERATING SYSTEMS LABORATORY\n\n\n\
L:0 T:0 P:2\n\n\n\
Course Outcomes:\n\n\n\
• Examine and validate the various features of process and threads, including scheduling,\n\
creation and termination\n\
• Utilize the data structures and algorithms used to implement an operating system\n\
• Implement the synchronization problems to ensure consistency of data\n\
Text Books:\n\
1. BEGINING LINUX PROGRAMMING by NEIL MATHEW & RICHARD STONES, WILEY\n\
References:\n\
1. OPERATING SYSTEM CONCEPTS by ABRAHAM SILBERSCHATZ, GALVIN, WILEY\n\
2. ADVANCED PROGRAMMING IN THE UNIX ENVIRONMENT by W.RICHARD\n\
STEVENS AND STEPHEN A. RAGO, PEARSON\n\
3. OPERATING SYSTEMS A DESIGN-ORIENTED APPROACH by CHARLES CROWLEY,\n\
M.G.Hills\n\
Credits:1\n\
Through this course students should be able to\n\
Process creation and threading\n\
• Creating Threads\n\
• Replacing process image using execlp\n\
• Process duplication using fork\n\
Inter-process communication\n\
• Pipes, popen and pclose functions\n\
• Stream pipes, passing file descriptors\n\
• Shared memory\n\
• Message passing\n\
Synchronization\n\
• Synchronization with Mutexes\n\
• Synchronization with semaphores\n\
• Race Condition\n\
Simulation of Shell commands using system calls\n\
• file/directory related system calls / library functions (read, write, open, close, lseek,\n\
opendir, readdir, closedir, etc)\n\
File allocation strategies\n\
• sequential file allocation, indexed file allocation, linked file allocation\n\
List of Practicals / Experiments:')
qr.make(fit=True)
img = qr.make_image()
img.save("image.png")
